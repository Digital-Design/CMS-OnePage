
<div class="panel panel-default">
  <div class="panel-heading">
   <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Statistiques de visite</h3>
 </div>
 <div class="panel-body">
   <div id="visiteanalytique" style="height: 250px;"></div>
 </div>
</div>

<div class="row">
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-comments fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?php echo count($contactstats) ?></div>
            <div>Commentaire(s) cette semaine !</div>
          </div>
        </div>
      </div>
      <?php if($contactstats): ?>
        <!-- CONTACT -->
        <a id="contact">
          <div class="panel-footer">
            <span class="pull-left">Voir plus de Détails</span>
            <span class="pull-right"><i class="fa fa-plus-circle"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
        <div class="list-group" id="commentaires" style="display:none;">
          <?php foreach ($contactstats as $key => $commentaire): ?>

            <a class="list-group-item">
              <h4 class="list-group-item-heading" style="word-wrap: break-word;"><?php echo $commentaire['mail'] ?> - <?php echo $commentaire['nom'] ?></h4>
              <p class="list-group-item-text" style="word-wrap: break-word;"><?php echo $commentaire['commentaire'] ?></p>
            </a>

          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="panel panel-green">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-users fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?php echo count($analytiquestats) ?></div>
            <div>Visite(s) cette semaine !</div>
          </div>
        </div>
      </div>
      <a href="index.php?page=analytique">
        <div class="panel-footer">
          <span class="pull-left">Voir plus de Détails</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>

  <div class="col-lg-3 col-md-6">
  <div class="panel panel-yellow">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-3">
          <i class="fa fa-shopping-cart fa-5x"></i>
        </div>
        <div class="col-xs-9 text-right">
          <div class="huge">124</div>
          <div>autres !</div>
        </div>
      </div>
    </div>
    <a href="#">
      <div class="panel-footer">
        <span class="pull-left">View Details</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
        <div class="clearfix"></div>
      </div>
    </a>
  </div>
</div>

</div>


<script type="text/javascript">

//deroulant pour les contacts
$(document).on('click', '#contact', function(e) {
  if($("div span i" , this ).hasClass('fa-plus-circle')){
    $("div span i" , this ).toggleClass('fa-plus-circle fa-minus-circle');
    $("#commentaires").hide(500);
  }else{
    $("div span i" , this ).toggleClass('fa-minus-circle fa-plus-circle');
    $("#commentaires").show(500);
  }
});

//traitement des données qui va permettre d'afficher 0 visiteurs quand il n'y a pas de données
var result = [];
var previous = null;
var data = <?php echo(json_encode($analytiquegraphstats)) ?>;
for (var i in data) {
  var item = data[i];
  if (previous != null){
    var donnees = new Date(item.date_analytique);
    for (var day = previous.getDate() + 1; day < donnees.getDate() ; day++){
      var date = previous;
      date.setDate(date.getDate() + 1);
      result.push({day: (date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + (date.getDate())) , value: 0 });
    }
  }
  result.push({day: item.date_analytique, value: item.value });
  previous = new Date(item.date_analytique);
}

//chargement du graphique
new Morris.Line({
  element: 'visiteanalytique',
  data: result,
  xkey: 'day',
  ykeys: ['value'],
  labels: ['Visiter(s)']
});
</script>