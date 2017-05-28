<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
  <div class="content">
    <div class="games index large-12 columns content">
      <div class="panel games">
        <div class="panel-heading panel-title">
          <?= __('Skills') ?>
        </div>
        <div class="panel-table">
        <?php foreach ($games as $game): ?>
        <? $titleSymbols = array( '!', ':', '.' ,'\'');?>
            <div class="game item col-3 <?= strtolower(str_replace($titleSymbols, '', (str_replace(' ', '-', $game->game_name))))?>">
              <div class="content-game">
                <?= $this->Html->image('games/poster-art/' . strtolower(str_replace($titleSymbols, '', (str_replace(' ', '-', $game->game_name)))) . '-' . $game->release_year . '.jpg')?>
                <div class="game-name">
                  <?= $this->Html->link(__(($game->game_name)), ['action' => 'view', $game->id]) ?>
                </div>
                <?= h($game->release_year) ?></td>
                <div class="game-platforms">
                  <?php foreach ($game->platforms as $platform): ?>
                  <a class="btn btn-platform <?= strtolower(str_replace($titleSymbols, '', (str_replace(' ', '-', $platform->platform_name))))?>" href="#">
                    <?= str_replace('Nintendo ', '', (str_replace('Portable', 'P', (str_replace('PlayStation', 'PS1', (str_replace('PlayStation ', 'PS', $platform->platform_name))))))) ?>
                  </a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    <!-- <h3><?= __('Games') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('game_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('release_year') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($games as $game): ?>
            <tr>
                <td><?= $this->Number->format($game->id) ?></td>
                <td><?= h($game->game_name) ?></td>
                <td><?= h($game->release_year) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $game->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $game->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $game->id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div> -->
</div>

</div>
</div>
