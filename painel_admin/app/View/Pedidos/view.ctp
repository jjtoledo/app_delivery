<div class="pedidos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Pedido'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Ações'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-menu-left"></span>&nbsp&nbsp;Voltar'), array('action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Pedido'), array('action' => 'delete', $pedido['Pedido']['id']), array('escape' => false), __('Você realmente deseja excluir este pedido?')); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
					<tr>
						<th><?php echo __('Cliente'); ?></th>
						<td>
							<?php echo $this->Html->link($pedido['Cliente']['nome'], array('controller' => 'clientes', 'action' => 'view', $pedido['Cliente']['id'])); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Status'); ?></th>
						<td>
							<?php echo h($pedido['Pedido']['status']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Data'); ?></th>
						<td>
							<?php echo date('d/m/Y', strtotime(h($pedido['Pedido']['data']))); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Total'); ?></th>
						<td>
							<?php echo 'R$' . h($pedido['Pedido']['total']); ?>
							&nbsp;
						</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
		<h3><?php echo __('Related Pedido Produtos'); ?></h3>
		<?php if (!empty($pedido['PedidoProduto'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo __('Pedido Id'); ?></th>
					<th><?php echo __('Produto Id'); ?></th>
					<th><?php echo __('Qtd'); ?></th>
					<th class="actions"></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($pedido['PedidoProduto'] as $pedidoProduto): ?>
					<tr>
						<td><?php echo $pedidoProduto['pedido_id']; ?></td>
						<td><?php echo $pedidoProduto['produto_id']; ?></td>
						<td><?php echo $pedidoProduto['qtd']; ?></td>
						<td class="actions">
							<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'pedido_produtos', 'action' => 'view', $pedidoProduto['pedido_id']), array('escape' => false)); ?>
							<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'pedido_produtos', 'action' => 'edit', $pedidoProduto['pedido_id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'pedido_produtos', 'action' => 'delete', $pedidoProduto['pedido_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $pedidoProduto['pedido_id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div><!-- end col md 12 -->
</div>
