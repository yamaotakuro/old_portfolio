

<!-- / #page --></div>

<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo do_shortcode('[uf_google_ua]'); ?>', 'auto');
  ga('require', 'displayfeatures');
  ga('require', 'linkid', 'linkid.js');
  ga('send', 'pageview'<?php if(function_exists('iqfm_googleanalytics')) { if(is_page('contact')) { iqfm_googleanalytics(1); } }  ?>);

</script>

</body>
</html>