<?php

namespace Drupal\custom_agenda\Plugin\Block;
use Drupal\taxonomy\Entity\Term;
use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Entity\EntityFormBuilder;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\Display\EntityViewDisplayInterface;



/**
 * Provides a 'agenda' Block.
 *
 * @Block(
 *   id="agenda_block",
 *   admin_label = @Translation("Agenda block"),
 *   category = @Translation("Agenda Block"),
 * )
 */
class AgendaBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    // $node =\Drupal::routeMatch()->getParameter('node') ;
    // $currentNodeID= $node->get('nid')->first()->getValue()['value'];
    // $currentTaxo = Term::load($node->get('field_taxo_agenda_test')->target_id);
    // $currentTaxoName = $currentTaxo->getName();

    // $route_match = \Drupal::routeMatch();

    // if ($route_match->getRouteName() == 'entity.node.evenement_') {
    //   exit("jeere");
    //   return true;
    // }
    $nids = \Drupal::entityQuery('node')->condition('type','evenement_')->execute();
    $node =  \Drupal\node\Entity\Node::loadMultiple($nids);

    foreach ($node as $nodes) {
      $nodeID=$nodes->get('nid')->first()->getValue()['value'];
      // dump($nodeID);
      // if($nodeID!=$currentNodeID){
      // $currentTaxoOthers= Term::load($nodes->get('field_taxo_agenda_test')->target_id);
      // dump($currentTaxoOthers);
      // if($currentTaxoOthers!=null){
        // $currentTaxoName2 = $currentTaxoOthers->getName();

        // if($currentTaxoName==$currentTaxoName2){
          // $othersEvents=$nodes ;
        //  $nodeIdOthers=$nodes->get('nid')->first()->getValue()['value'];
         $nodeTitleOthers[]=$nodes->get('title')->first()->getValue()['value']??"";
         $nodeBodyOthers[]=$nodes->get('body')->first()->getValue()['value']??"";
    
    }
   

  return [
    "#theme"=>'custom_agenda_type_block',
    "#titles"=>$nodeTitleOthers,
  ];
  }

}