CREATE TABLE `sistemasweb`.`alumnos` (
  `id_alumno` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(245) NOT NULL,
  `apellidoPaterno` VARCHAR(245) NOT NULL,
  `apellidoMaterno` VARCHAR(245) NOT NULL,
  `matricula` INT NOT NULL,
  `fechaNacimiento` DATE NOT NULL,
  `especialidad` VARCHAR(245) NOT NULL,
  `sexo` VARCHAR(245) NOT NULL,
  `ruta` VARCHAR(245) NOT NULL,
  `fechaInsert` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id_alumno`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;
ALTER TABLE `sistemasweb`.`alumnos` 
RENAME TO  `sistemasweb`.`t_alumnos` ;
ALTER TABLE `sistemasweb`.`t_alumnos` 
CHANGE COLUMN `ruta` `extension` VARCHAR(245) NOT NULL ;
ALTER TABLE `sistemasweb`.`t_alumnos` 
ADD COLUMN `nombre_archivo` VARCHAR(245) NOT NULL AFTER `nombre`;
ALTER TABLE `sistemasweb`.`t_alumnos` 
DROP COLUMN `nombre_archivo`;
ALTER TABLE `sistemasweb`.`t_alumnos` 
ADD COLUMN `nombre_archivo` VARCHAR(245) NOT NULL AFTER `nombre`;