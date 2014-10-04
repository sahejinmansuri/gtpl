<?php 
?>
<?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
<?php endif; ?>
<?php
print render($page['content']);
print render($page['content_channel']); ?>
    