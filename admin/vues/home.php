
<div class="panel panel-default">
  <div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Statistiques de visite</h3>
 </div>
 <div class="panel-body">
   <div id="myfirstchart" style="height: 250px;"></div>
 </div>
</div>

<div class="col-lg-4 col-md-6">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-3">
          <i class="fa fa-comments fa-5x"></i>
        </div>
        <div class="col-xs-9 text-right">
          <div class="huge"><?php echo count($contact) ?></div>
          <div>Commentaire(s) cette semaine !</div>
        </div>
      </div>
    </div>
    <?php if($contact): ?>
      <!-- CONTACT -->
      <a id="contact">
        <div class="panel-footer">
          <span class="pull-left">Voir plus de Détails</span>
          <span class="pull-right"><i class="fa fa-plus-circle"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
      <div class="list-group" id="commentaires" style="display:none;">
        <?php foreach ($contact as $key => $commentaire): ?>

          <a class="list-group-item">
            <h4 class="list-group-item-heading" style="word-wrap: break-word;"><?php echo $commentaire['mail'] ?> - <?php echo $commentaire['nom'] ?></h4>
            <p class="list-group-item-text" style="word-wrap: break-word;"><?php echo $commentaire['commentaire'] ?></p>
          </a>

        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</div>




<script type="text/javascript">
  $(document).on('click', '#contact', function(e) {
    if($("div span i" , this ).hasClass('fa-plus-circle')){
      $("div span i" , this ).toggleClass('fa-plus-circle fa-minus-circle');
      $("#commentaires").toggle(500);
    }else{
      $("div span i" , this ).toggleClass('fa-minus-circle fa-plus-circle');
      $("#commentaires").show(500);
    }
  });


  new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
  { year: '2008', value: 20 },
  { year: '2009', value: 10 },
  { year: '2010', value: 5 },
  { year: '2011', value: 5 },
  { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
</script>