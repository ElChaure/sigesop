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
       $record=Personal::model()->findByAttributes(array('username'=>$this->username)); 
 
       if($record===null)
               {
                       $this->_id='user Null';
                                   $this->errorCode=self::ERROR_USERNAME_INVALID;
               }
       else if($record->password!==$this->password) 
               {       $this->_id=$this->id;
                       $this->errorCode=self::ERROR_PASSWORD_INVALID;
               }
         else if($record['status']!=='1')     
               {        
                       $err = "Usted ha sido Inactivado por el Administrador.";
                       $this->errorCode = $err;
               }
        
       else
       {  

       /** Defino el rol de acuerdo al usrtipo **/
       switch ($record->usrtipo) {
              case 0: $rol = 'Administrador'; break;
              case 1: $rol = 'Usuario'; break;
              default:
                   $rol = '';
              }
        

           $this->setState('rol', $rol);
           $this->_id=$record['id'];
           $this->setState('codigo', $record['id']);            
           $this->setState('title', $record['username']);
           $this->setState('id', $record['nombre'].' '.$record['apellido']);
           $this->setState('usrtipo', $record['usrtipo']);

           $this->errorCode=self::ERROR_NONE;

       }
       return !$this->errorCode;
   }

   public function getId()
   {
       return $this->_id;
   }
}

