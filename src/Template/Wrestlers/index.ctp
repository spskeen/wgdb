<?php
/**
* @var \App\View\AppView $this
*/
?>
<section class="section-header wrestlers-head">
  <div class="container">
    <div class="wrapper">
      <div class="section-masthead" itemprop="description">
        <h1>All Wrestlers</h1>
        <p>Sort by overall, height, weight class or game.</p>
      </div>

    </div>
  </div>
</section>
<div class="container">
  <?php if (!empty($wrestlers)): ?>
    <div class="wrestlers index large-12 medium-8 columns content">
      <div class="panel all-wrestlers">
        <div class="table-responsive">
          <div class="table">
            <div class="table-row panel-heading panel-title">
              <div class="table-head"><?= $this->Paginator->sort('overall')?></div>
              <div class="table-head">Name</div>
              <div class="table-head reaction">Reaction</div>
              <div class="table-head height"><?= $this->Paginator->sort('height_id')?></div>
              <div class="table-head weight"><?= $this->Paginator->sort('weight_class_id')?></div>
              <div class="table-head game"><?= $this->Paginator->sort('game_id')?></div>
            </div>
            <?php foreach ($wrestlers as $wrestler): ?>
              <div class="table-row panel-table item">
                <div class="table-cell"><span class="label overall"><?= $this->Number->format($wrestler->overall) ?></span></div>
                <div class="table-cell">
                  <?= $this->Html->link(__($wrestler->wrestler_name), ['action' => 'view', $wrestler->id]) ?>
                </div>
                <div class="table-cell reaction"><?= h ($wrestler->reaction->crowd_reaction) ?></div>
                <div class="table-cell height"><?= h ($wrestler->height->height) ?></div>
                <div class="table-cell weight"><?= h ($wrestler->weight_class->weight_class) ?></div>
                <div class="table-cell game"><?= $wrestler->has('game') ? $this->Html->link($wrestler->game->game_name, ['controller' => 'Games', 'action' => 'view', $wrestler->game->id]) : '' ?></div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <div class="paginator">
    <ul class="pagination">
      <?= $this->Paginator->first('<< ' . __('first')) ?>
      <?= $this->Paginator->prev('< ' . __('previous')) ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next(__('next') . ' >') ?>
      <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} of {{count}} total')]) ?></p>
  </div>
</div>
