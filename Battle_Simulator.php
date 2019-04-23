<?php 
/*Author:subinsugunan89@gmail.com
  Date :16-4-2018;
  Des:Create a command line PHP application that simulates a battle between two combatants.
*/

$combatant1=array();   /*Initializing the combatant*/
$combatant2=array();
$combatant3=array();

//Assigning the radom values into Combatant Types
$combatant1=array("name"=> "ABC",
  "type"=> "Swordsman",
  "health" => 45, // 40 - 60
  "strength" => 65, // 60 - 70
  "defense" => 25, // 20 - 30
  "speed" => 95, // 90 - 100
  "luck" =>1
);

$combatant2=array("name"=> "PQR",
  "type"=> "Brute",
  "health" =>  90, // 90 - 100
  "strength" => 70, // 65 - 75
  "defense" => 45, // 40 - 50
  "speed" =>55, // 40 - 65
   "luck" =>1
);

$combatant3=array("name"=> "XYZ",
  "type"=> "Grappler",
  "health" =>  65, // 60 - 100
  "strength" => 80, // 75 - 80
  "defense" => 38, // 35 - 40
  "speed" =>65, // 60 - 80
   "luck" =>1
);

// in players array, there will be 2 combats, first combat's strength >= second combat


function showAttackCountsMessage($name, $counts) {
  if ($counts > 0) {
    echo $name .' attacked '.$counts .' times'.'<br></br>';
  } else {
    echo $name .' did not get chance to attack'.'<br></br>';
  }
  return ;
}

/*
Des:battle simulation and outputs a line of text each turn explaining
Equation :Damage = Attacker strength – Defenders Defense
Return :Display Message with 
*/
function attack($p1, $p2, $attackCounts) {

  if ($attackCounts > 30) {
    echo 'match draw....';
    return;
  }
  if ($p1['health'] <= 0) {
   echo $p2['name'] . ' wins match.';
   echo '<br></br>';

    showAttackCountsMessage($p2['name'], $p2['attackCounts']);
    showAttackCountsMessage($p1['name'], $p1['attackCounts']);
    return;
  } else if ($p2['health'] <= 0) {
    echo $p1['name'] . ' wins match.';
    echo '<br></br>';

    showAttackCountsMessage($p1['name'], $p1['attackCounts']);
    showAttackCountsMessage($p2['name'], $p2['attackCounts']);

    return;
  }

  $attackerName = $p1['name'];
  $defenderName = $p2['name'];

  echo $attackerName.' (with '.$p1['health'].' health, '.$p1['strength'].' strength & '.$p1['defense'] .' defense)' .
    ' Attacks on ' .$defenderName.' (with '.$p2['health'].' health, '.$p2['strength'].' strength & '.$p2['defense'] .' defense)';
 echo '<br>';
  $damage =$p1['strength'] - $p2['defense']; // formula to count damage
 $p1['attackCounts']=$p1['attackCounts']+1;
  if ($damage > 0) {
     echo '    It was strong attack by '.$attackerName;
     echo '<br>';
     echo '       Damage of '.$defenderName .' is '.$damage;
     echo '<br>';
     echo '       Health of '.$defenderName. ' reduced from '.$p2['health'] .' to '.($p2['health'] - $damage);
     echo '<br>';
    $p2['health'] -= $damage;
  } else if ($damage < 0) {
     echo '       It was strong defense from '.$defenderName;
     echo '<br></br>';
     echo '       Damage of '.$attackerName. ' is '.($damage * -1);
     echo '<br></br>';
     echo  $attackerName. ' looses health from '.$p1['health'] .' to ' .($p1['health'] + $damage);
     echo '<br></br>';
     $p1['health'] += $damage;
  } else {
     echo '       This attack is neutral... health of both player is remain same...';
     echo '<br></br>';
  }

  echo '<br></br>';

  $attackCounts++;
  attack($p2, $p1, $attackCounts);
} // end of function Attack


function makeFights($player1, $player2) {

	
  echo '*********** ____ Here Fight Begins ____***********'.'<br></br>';
  /* 1st Attack will be done by stronger player so below if condition is required  */

  $player1['attackCounts'] = 0;
  $player2['attackCounts'] = 0;
  
  
if ($player1['speed'] > $player2['speed'])
    Attack($player1, $player2, 0);
  else
    Attack($player2, $player1, 0);

  echo '____END ____';
  echo '<br></br>';

}

/*Battle Start*/
makeFights($combatant3, $combatant1);
makeFights($combatant2, $combatant1);
makeFights($combatant2, $combatant3);

 ?>
