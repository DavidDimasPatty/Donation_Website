<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/tugasbesar/' :
        require_once "controller/halaman/halamanController.php";
				$userCtrl2 = new halamanController();
                echo $userCtrl2->view_halaman();
				break;
        
case '/tugasbesar/view/admin/login' :
        require_once "controller/admin/adminController.php";
				$userCtrl2 = new adminController();
                echo $userCtrl2->view_login();       
            break;
            case '/tugasbesar/view/donatur/login/verif':
              require_once "controller/donatur/donaturController.php";
              $signup = new donaturController();
              echo $signup->email();      
               break;
               case '/tugasbesar/view/fundraiser/login/verif':
                require_once "controller/donatur/donaturController.php";
                $signup = new donaturController();
                echo $signup->email();      
                 break;

  case '/tugasbesar/view/donatur/login' :
         require_once "controller/donatur/donaturController.php";
            $userCtrl1 = new donaturController();
             echo $userCtrl1->view_login();       
               break;
  case '/tugasbesar/view/donatur/check' :
         require_once "controller/donatur/donaturController.php";
            $userCtrl1 = new donaturController();
            echo $userCtrl1->checklogin();       
             break;
    case '/tugasbesar/view/admin/check' :
                require_once "controller/admin/adminController.php";
                   $userCtrl1 = new adminController();
                   echo $userCtrl1->checklogin();       
                    break;           
    case '/tugasbesar/view/admin/login/halamandepan' :
         require_once "view/admin/halDepanAdmin.php";
                  break;
            
    case '/tugasbesar/view/admin/login/halamandepan/daftardonatur' :
            require_once "controller/admin/adminController.php";
             $userCtrl2 = new adminController();
            echo $userCtrl2->view_user();       
            break;

            case '/tugasbesar/view/admin/login/halamandepan/daftarfundraiser' :
              require_once "controller/admin/adminController.php";
               $userCtrl2 = new adminController();
              echo $userCtrl2->view_fundraiser();       
              break;    
case '/tugasbesar/view/fundraiser/login' :
         require_once "controller/fundraiser/fundraiserController.php";
         $userCtrl1 = new fundraiserController();
         echo $userCtrl1->view_login();       
         break;

  case '/tugasbesar/view/fundraiser/check' :
            require_once "controller/fundraiser/fundraiserController.php";
               $userCtrl1 = new fundraiserController();
               echo $userCtrl1->checklogin();       
                break;
    

        case '/tugasbesar/view/fundraiser/login/halamandepan' :
          require_once "controller/fundraiser/fundraiserController.php";
          $userCtrl1 = new fundraiserController();
          echo $userCtrl1->view_haldepan();       
          break;

             case '/tugasbesar/view/donatur/signup' :
                require_once "view/donatur/signup.php";
                break;
           case '/tugasbesar/view/fundraiser/signup' :
           require_once "view/fundraiser/signup.php";
             break;

             case '/tugasbesar/view/donatur/checkvalid' :
                require_once "controller/donatur/donaturController.php";
                $signup = new donaturController();
                echo $signup->checksignup();       
                break;
         
                case '/tugasbesar/view/fundraiser/checkvalid' :
                    require_once "controller/fundraiser/fundraiserController.php";
                    $signup = new fundraiserController();
                    echo $signup->checksignup();       
                    break;
             
                    case '/tugasbesar/view/fundraiser/login/buatdonasi' :
                        require_once "view/fundraiser/buatdonasi.php";
                          break;

                  
                    case '/tugasbesar/view/fundraiser/login/checkvalid' :
                      require_once "controller/fundraiser/fundraiserController.php";
                      $signup = new fundraiserController();
                      echo $signup->checkdonasi();       
                      break;

                      case '/tugasbesar/view/fundraiser/login/profil' :
                        require_once "controller/fundraiser/fundraiserController.php";
                        $signup = new fundraiserController();
                        echo $signup->view_fundraiser();       
                        break;
                 
                        
                         case '/tugasbesar/view/donatur/profil':
                          require_once "controller/donatur/donaturController.php";
                          $signup = new donaturController();
                          echo $signup->view_user();      
                           break;

                           //edit profil
                           case '/tugasbesar/view/donatur/checkedit1':
                            require_once "controller/donatur/donaturController.php";
                            $signup = new donaturController();
                            echo $signup->checkeditpp();      
                             break;

                             case '/tugasbesar/view/donatur/checkedit2':
                              require_once "controller/donatur/donaturController.php";
                              $signup = new donaturController();
                              echo $signup->checkeditpw();      
                               break;
                               case '/tugasbesar/view/fundraiser/login/checkedit1':
                                require_once "controller/fundraiser/fundraiserController.php";
                                $signup = new fundraiserController();
                                echo $signup->checkeditpp();      
                                 break;
    
                                 case '/tugasbesar/view/fundraiser/login/checkedit2':
                                  require_once "controller/fundraiser/fundraiserController.php";
                                  $signup = new fundraiserController();
                                  echo $signup->checkeditpw();      
                                   break;
                                    //donasi dan fundraiser
                                   
                                    case '/tugasbesar/view/donatur/login/halamandepan/page?var='.$_GET['var'] :
                                      require_once "controller/donatur/donaturController.php";
                                       $userCtrl2 = new donaturController();
                                        echo $userCtrl2->view_donasi();       
                                       break;  

                                       //donatur riwayat
                                       case '/tugasbesar/view/donatur/riwayat/page?var='.$_GET['var']:
                                        require_once "controller/donatur/donaturController.php";
                                        $signup = new donaturController();
                                        echo $signup->view_riwayatdon();       
                                         break;

                                     //riwayat selected donatur
                       
                                     case '/tugasbesar/view/fundraiser/riwayat/page?var='.$_GET['var'] :
                                      require_once "controller/fundraiser/fundraiserController.php";
                                      $signup = new fundraiserController();
                                      echo $signup->view_riwayat();       
                                      break;

                                      case '/tugasbesar/view/fundraiser/riwayat?var='.$_GET['var'] :
                                        require_once "controller/fundraiser/fundraiserController.php";
                                        $signup = new fundraiserController();
                                        echo $signup->view_selected_donasi();       
                                        break;
                         case '/tugasbesar/view/fundraiser/login/riwayat?var='.$_GET['var']:
                          require_once "controller/fundraiser/fundraiserController.php";
                          $signup = new fundraiserController();
                          echo $signup->view_selected_donasi();       
                           break;

                           case '/tugasbesar/view/fundraiser/edit?var='.$_GET['var']:
                            require_once "controller/fundraiser/fundraiserController.php";
                            $signup = new fundraiserController();
                            echo $signup->view_selected_edit();       
                             break;

                             case '/tugasbesar/view/fundraiser/checkupdate?var='.$_GET['var']:
                              require_once "controller/fundraiser/fundraiserController.php";
                              $signup = new fundraiserController();
                              echo $signup->checkupdate();       
                               break;
                               
                               case '/tugasbesar/view/admin/login/halamandepan/verifikasi?var='.$_GET['var'] :
                                require_once "controller/admin/adminController.php";
                                $signup = new adminController();
                                echo $signup->view_selected_verif();       
                                break;
                                
                                case '/tugasbesar/view/admin/login/halamandepan/unverifikasi?var='.$_GET['var'] :
                                  require_once "controller/admin/adminController.php";
                                  $signup = new adminController();
                                  echo $signup->view_selected_unverif();       
                                  break;


                                   
                         
                      
                            case '/tugasbesar/view/donatur/login/campaign?var='.$_GET['var']:
                              require_once "controller/donatur/donaturController.php";
                              $signup = new donaturController();
                              echo $signup->view_selected_donasi();       
                              break;

                              case '/tugasbesar/view/donatur/login/haldonasi?var='.$_GET['var']:
                                require_once "controller/donatur/donaturController.php";
                                $signupl = new donaturController();
                                echo $signupl->view_bayar();    
                              break;

                              case '/tugasbesar/view/donatur/login/checkbayar?var='.$_GET['var']:
                                require_once "controller/donatur/donaturController.php";
                                $signupl = new donaturController();
                                echo $signupl->bayardonasi();    
                                break;

                                case '/tugasbesar/view/donatur/login/riwayat?var='.$_GET['var']:
                                  require_once "controller/donatur/donaturController.php";
                                  $signup = new donaturController();
                                  echo $signup->view_selected_riwayat();       
                                   break;

                                   case '/tugasbesar/view/admin/login/daftardonasi/page?var='.$_GET['var']:
                                    require_once "controller/admin/adminController.php";
                                    $signup = new adminController();
                                    echo $signup->view_donasi();       
                                     break;

                                     //BANK ADMIN PEMASUKAN
                                     case '/tugasbesar/view/admin/login/halamandepan/bankadmin?var='.$_GET['var']:
                                      require_once "controller/admin/adminController.php";
                                      $signup = new adminController();
                                      echo $signup->view_bank();       
                                       break;

                                       //BANK ADMIN PENGELUARAN
                                     case '/tugasbesar/view/admin/login/halamandepan/banktarik?var='.$_GET['var']:
                                      require_once "controller/admin/adminController.php";
                                      $signup = new adminController();
                                      echo $signup->view_banktarik();       
                                       break;
            
                                       //penarikan fundraiser
                                       case '/tugasbesar/view/fundraiser/penarikan/riwayat?var='.$_GET['var']:
                                        require_once "controller/fundraiser/fundraiserController.php";
                                        $signup = new fundraiserController();
                                        echo $signup->tarik();       
                                         break;
            
                                     case '/tugasbesar/view/admin/login/daftardonasi/donasi/unverifikasi?var='.$_GET['var'].'&var2='.$_GET['var2'] :
                                      require_once "controller/admin/adminController.php";
                                      $signup = new adminController();
                                      echo $signup->view_selected_unverif_don();       
                                      break;
            
                                      
                                  case '/tugasbesar/view/admin/login/daftardonasi/donasi/verifikasi?var='.$_GET['var'] .'&var2='.$_GET['var2']:
                                    require_once "controller/admin/adminController.php";
                                    $signup = new adminController();
                                    echo $signup->view_selected_verif_don();       
                                  break;
            
                                    }

            
?>