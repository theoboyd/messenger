  </div><!--closes content div-->
  <div id="footer">
    <hr>
    <?php
    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    $finish = $time;
    $total_time = round(($finish - $start), 4);
    echo 'Page generated in '.$total_time.' seconds.';
    ?>
  </div>
</div><!--closes wrapper div-->
</body>
</html>