diff --git a/plugins/content_types/related_content.inc b/plugins/content_types/related_content.inc
index 5d7db93..d002091 100644
--- a/plugins/content_types/related_content.inc
+++ b/plugins/content_types/related_content.inc
@@ -17,7 +17,12 @@ function related_content_content_type_render($subtype, $conf, $panel_args, $cont
   $block = new stdClass();
 //  $tid = taxonomy_get_term_by_name('krimi');
 //  $nodes = taxonomy_select_nodes($tid);
-  $block->content = '<div id="ting-search-context"> test</div>';
+  drupal_add_js('misc/collapse.js');
+  $block->content = '    <div class="ting-object-wrapper"><div class="ting-object-inner-wrapper"><div class="field-group-format field-group-div group-material-details collapsible collapsed  speed-fast effect-none fieldgroup-effects-processed">
+      <h2><span class="field-group-format-toggler"><a href="#" class="field-group-format-title">Detaljer om materialet</a></span></h2>
+      <div style="display: none;" class="field-group-format-wrapper"><
+
+</div></div></div></div>';
   return $block;
 }
 
