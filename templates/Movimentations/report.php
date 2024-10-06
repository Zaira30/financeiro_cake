<h1>Relatório de Movimentações</h1>

<!-- Filtros por Tipo e Data -->
<form method="get" action="">
    <div class="filter-container">
        <div>
            <label for="type">Tipo:</label>
            <select name="type" id="type">
                <option value="">Todos</option>
                <option value="1">Entrada</option>
                <option value="0">Saída</option>
            </select>
        </div>
        <div>
            <label for="date-start">Data de Início:</label>
            <input type="date" name="date_start" id="date-start">
        </div>
        <div>
            <label for="date-end">Data de Fim:</label>
            <input type="date" name="date_end" id="date-end">
        </div>
        <div style="flex-basis: 2%; align-self: flex-end;">
            <button type="submit">Filtrar</button>
        </div>
    </div>
</form>

<!-- Tabela de Movimentações -->
<div class="table-container">
    <table id="movimentations-table" class="display">
        <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Usuário</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($movimentations as $movimentation): ?>
            <tr>
                <td><?= h($movimentation->id) ?></td>
                <td><?= h($movimentation->descriptions) ?></td>
                <td><?= $movimentation->type == 0 ? 'Saída' : 'Entrada'; ?></td>
                <td><?= $this->Number->currency($movimentation->value, 'BRL') ?></td>
                <td><?= h($movimentation->created->format('d/m/Y H:i:s')) ?></td>
                <td><?= $movimentation->has('user') ? h($movimentation->user->name) : '' ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
