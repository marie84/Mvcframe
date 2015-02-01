<?php if($content['id']):?>
  <h1><?=esc($content['title'])?></h1>
  <p><?=$content->GetFilteredData()?></p>
  <p class='smaller-text silent'><a href='<?=create_url("content/edit/{$content['id']}")?>'>edit</a> <a href='<?=create_url("content")?>'>
<?php else:?>
  <p>404: No such page exists.</p>
<?php endif;?>

<?php if($content['created']): ?>
  
<?php else: ?>
  <h1>Create Content</h1>
  <p>Create new content.</p>
<?php endif; ?>

