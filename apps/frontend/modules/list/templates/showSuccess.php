<div class="tagList">
</div>

<h2><?php echo $list->name?></h2>
<div id="todo" class="ui-widget ui-helper-reset">
  <?php foreach ($items as $item): ?>
    <?php include_partial('list/item',array('item' => $item, 'include_dashboard_links' => true))?>
  <?php endforeach; ?>
</div>
<?php if ($sf_user->isOwnerOf($list)): ?>
  <?php echo link_to('Edit', 'list/edit?id='.$id, array('class'=>"crud"))?>
  <?php echo link_to('perraca', 'list/edit?id='.$id, array('class'=>"crud"))?>
<?php endif?>
