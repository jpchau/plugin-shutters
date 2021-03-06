<?php

/* This file is part of NextDom Software.
 *
 * NextDom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * NextDom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */

 
require_once __DIR__ . '/../../../../core/php/core.inc.php';
require_once 'shuttersCmd.class.php';

class shutters extends eqLogic
{
    /*
     * Fonction exécutée automatiquement toutes les minutes par Jeedom
      public static function cron() {

      }
     */


    /*
     * Fonction exécutée automatiquement toutes les heures par Jeedom
      public static function cronHourly() {

      }
     */

    /*
     * Fonction exécutée automatiquement tous les jours par Jeedom
      public static function cronDaily() {

      }
     */



    /*     * *********************Méthodes 
  

    public function preInsert()
    {
        
    }

    public function postInsert()
    {
    
    }

    public function preSave()
    {
        
    }

    public function postSave()
    {

    }
    */
    public function preUpdate()
    {
        if($this->getConfiguration('objectType') == ''){
            throw new \Exception(__('Le type d\'objet doit être renseignée!', __FILE__));
            return;
        }        

        if($this->getConfiguration('objectType') == 'shutter'){
            if($this->getConfiguration('closedPosition') == ''){
                throw new \Exception(__('La position fermeture du volet doit être renseignée!', __FILE__));
                return;
            }        
            if($this->getConfiguration('openedPosition') == ''){
                throw new \Exception(__('La position ouverture du volet doit être renseignée!', __FILE__));
                return;
            }        
            if($this->getConfiguration('openedPosition') < $this->getConfiguration('closedPosition')){
                throw new \Exception(__('La position ouverture du volet doit être supérieure à la position fermeture!', __FILE__));
                return;
            } 
            if($this->getConfiguration('openingType') == ''){
                throw new \Exception(__('Le type d\'ouvrant associé au volet doit être renseigné!', __FILE__));
                return;
            } 
        }       

        if($this->getConfiguration('objectType') == 'shuttersArea'){
            $heliotrope = eqLogic::byId($this->getConfiguration('heliotrope'));
            if (!(is_object($heliotrope) && $heliotrope->getEqType_name() == 'heliotrope')) {
                throw new \Exception(__('L\'objet héliotrope doit être renseigné!', __FILE__));
                return;
            }        
            if($this->getConfiguration('dawnType') == ''){
                throw new \Exception(__('Le lever du soleil doit être renseigné!', __FILE__));
                return;
            }        
            if($this->getConfiguration('duskType') == ''){
                throw new \Exception(__('La coucher du soleil doit être renseigné!', __FILE__));
                return;
            }        
            if($this->getConfiguration('incomingAzimuthAngle') == ''){
                throw new \Exception(__('L\'angle d\'entrée du soleil dans l\'ouvrant doit être renseigné!', __FILE__));
                return;
            }        
            if($this->getConfiguration('outgoingAzimuthAngle') == ''){
                throw new \Exception(__('L\'angle de sortie du soleil de l\'ouvrant doit être renseigné!', __FILE__));
                return;
            }        
            if($this->getConfiguration('outgoingAzimuthAngle') < $this->getConfiguration('incomingAzimuthAngle')){
                throw new \Exception(__('L\'angle de sortie du soleil de l\'ouvrant doit être supérieur à l\'angle d\'entrée!', __FILE__));
                return;
            }        
        }       
    }

    /*public function postUpdate()
    {

    }

    public function preRemove()
    {
        
    }

    public function postRemove()
    {
        
    }*/

    /*
     * Non obligatoire mais permet de modifier l'affichage du widget si vous 
     en avez besoin
      public function toHtml($_version = 'dashboard') {

      }
     */

    /*
     * Non obligatoire mais ca permet de déclencher une action après 
     modification de variable de configuration
      public static function postConfig_<Variable>() {
      }
     */

    /*
     * Non obligatoire mais ca permet de déclencher une action avant 
     modification de variable de configuration
      public static function preConfig_<Variable>() {
      }
     */

    /*     * **********************Getteur Setteur*************************** */
}
