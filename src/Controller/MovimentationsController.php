<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Movimentations Controller
 *
 * @property \App\Model\Table\MovimentationsTable $Movimentations
 * @method \App\Model\Entity\Movimentation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MovimentationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $movimentations = $this->paginate($this->Movimentations);

        $this->set(compact('movimentations'));
    }

    public function report()
    {
        $query = $this->Movimentations->find('all', [
            'contain' => ['Users'],
            'order' => ['Movimentations.created' => 'desc']
        ]);

        // Verificar filtros por tipo
        if ($this->request->getQuery('type')) {
            $query->where(['Movimentations.type' => $this->request->getQuery('type')]);
        }

        // Verificar filtro por data de início
        if ($this->request->getQuery('date_start')) {
            $dateStart = $this->request->getQuery('date_start') . ' 00:00:00'; // Garantir que a comparação inclua a hora inicial
            $query->where(['Movimentations.created >=' => $dateStart]);
        }

        // Verificar filtro por data de fim
        if ($this->request->getQuery('date_end')) {
            $dateEnd = $this->request->getQuery('date_end') . ' 23:59:59'; // Garantir que a comparação inclua a hora final
            $query->where(['Movimentations.created <=' => $dateEnd]);
        }

        // Executa a query
        $movimentations = $query->toArray();
        $this->set(compact('movimentations'));
    }


    /**
     * View method
     *
     * @param string|null $id Movimentation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movimentation = $this->Movimentations->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('movimentation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $movimentation = $this->Movimentations->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['value'] = str_replace(['.', ','], ['', '.'], $data['value']);

            // Acessar o ID do usuário logado
            $user = $this->Authentication->getIdentity();
            $data['users_id'] = $user->id;  // Adicionar o ID do usuário logado no campo user_id

            $movimentation = $this->Movimentations->patchEntity($movimentation, $data);

            if ($this->Movimentations->save($movimentation)) {
                $this->Flash->success(__('Salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente!'));
        }
        $types = $this->getType();
        $users = $this->Movimentations->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('movimentation', 'users', 'types'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Movimentation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movimentation = $this->Movimentations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $data = $this->request->getData();
            $data['value'] = str_replace(['.', ','], ['', '.'], $data['value']);
            $movimentation = $this->Movimentations->patchEntity($movimentation, $data);
            if ($this->Movimentations->save($movimentation)) {
                $this->Flash->success(__('Alterado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar. Por favor, tente novamente!'));
        }
        // Formatar o valor para exibir a máscara no formulário
        $movimentation->value = number_format($movimentation->value, 2, ',', '.');
        $users = $this->Movimentations->Users->find('list', ['limit' => 200])->all();
        $types = $this->getType();
        $this->set(compact('movimentation', 'users','types'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Movimentation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movimentation = $this->Movimentations->get($id);
        if ($this->Movimentations->delete($movimentation)) {
            $this->Flash->success(__('Excluído com sucesso!'));
        } else {
            $this->Flash->error(__('Erro ao excluir. Por favor, tente novamente!'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getType()
    {
        $type = ['0' => 'Saída', '1' => 'Entrada'];
        return $type;
    }
}
