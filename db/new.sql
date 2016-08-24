/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  crowdmb
 * Created: Aug 24, 2016
 */

CREATE TABLE `vehicle_make` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `vehicle_model` ADD `vehicle_make_id` INT  NOT NULL  AFTER `vehicle_id`;
ALTER TABLE `vehicle_model` CHANGE `vehicle_make_id` `vehicle_make_id` INT(11)  NULL;

