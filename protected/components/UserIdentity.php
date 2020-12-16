<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
   private $_id;
   public function authenticate()
   {
       $record=Tecnicos::model()->findByAttributes(array('username'=>$this->username)); 
 
       if($record===null)
               {
                       $this->_id='user Null';
                                   $this->errorCode=self::ERROR_USERNAME_INVALID;
               }
       else if($record->password!==$this->password) 
               {       $this->_id=$this->id;
                       $this->errorCode=self::ERROR_PASSWORD_INVALID;
               }
         else if($record['estatus']!=='Activo')     
               {        
                       $err = "Usted ha sido Inactivado por el Administrador.";
                       $this->errorCode = $err;
               }
        
       else
       {  

       /** Defino el rol de acuerdo al usr_tipo **/
       switch ($record->usr_tipo) {
              case 0: $rol = 'Administrador'; break;
              case 1: $rol = 'Coordinador'; break;
              case 2: $rol = 'Tecnico'; break;
              case 3: $rol = 'Recepcionista'; break;
              default:
                   $rol = '';
              }
        

           $this->setState('rol', $rol);
           $this->_id=$record['id'];
           $this->setState('codigo', $record['id']);            
           $this->setState('title', $record['username']);
           $this->setState('id', $record['nombre_tecnico']);
           $this->setState('usr_tipo', $record['usr_tipo']);

           $this->errorCode=self::ERROR_NONE;

       }
       return !$this->errorCode;
   }

   public function getId()
   {
       return $this->_id;
   }
}

