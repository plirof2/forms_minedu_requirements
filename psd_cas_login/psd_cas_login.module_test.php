<?php


$cas_mail = $cas_user['mail'];  //ayt;o u;eloyme [cas:attribute:mail]
if (role_pde_dde_dpe_not_set()) {
    if (strpos ($mail,".pde.sch.gr")>=0 && strpos ($mail,"mail@")>=0 ) assign_role("ΠΕΡΙΦΕΡΕΙΑΚΗ ΔΙΕΥΘΥΝΣΗ ΕΚΠΑΙΔΕΥΣΗΣ - ΠΔΕ");
    if (strpos ($mail,"mail@dide")>=0 ) assign_role("ΔΙΕΥΘΥΝΣΗ ΔΕ - ΔIΔΕ");
    if (strpos ($mail,"mail@dipe")>=0 ) assign_role("ΔΙΕΥΘΥΝΣΗ ΠΕ - ΔIΠΕ");
} // end of if (role_pde_dde_dpe_not_set()) {
function assign_role($role_name){
//$_SESSION['sch_rol'] = $schcode;
    global $user;
    $key = array_search($role_name, $user->roles);
    if ($key == FALSE) {
      $roles = user_roles(TRUE);
      $rid = array_search($role_name, $roles);
      if ($rid != FALSE) {
        $new_role[$rid] = $role_name;
        user_save($user, array('roles' => $new_role));
      }
    } // end of if ($key == FALSE) {
} // end of function assign_role($role_name){



 ?>




 <?php


 function psd_cas_login_cas_user_alter(&$cas_user) {
     $cas_name = $cas_user['name'];
     $schcode = null;
     if(isset($cas_user['attributes']['edupersonorgunitdn:gsnunitcode']))
         $schcode =$cas_user['attributes']['edupersonorgunitdn:gsnunitcode'];
  //   $account = user_load_by_name($cas_name);
     $_SESSION['schcode'] = $schcode;
 /*
     if (!$account) {
         // No existing user could be found by CAS username.
         $_SESSION['schcode'] = $schcode;
     } else{
         if($account->status==0){
             sch_login_casLogout();
         }
     }
     */
 }
