
/*
DELETE FROM  stock_real;
*/

-- Appro -> stock

DROP TRIGGER IF EXISTS trigger_stock_supplies_insert_after;

DELIMITER delimiter
CREATE TRIGGER trigger_stock_supplies_insert_after AFTER INSERT ON stock_supplies
FOR EACH ROW

BEGIN

  DECLARE var_quantity int(11);
   
  SET var_quantity = NEW.quantity_add - NEW.quantity_rem;

  UPDATE products SET quantity = quantity + var_quantity WHERE id = NEW.id_product;

END;
delimiter
DELIMITER ;

/*
INSERT INTO `ica_stock`.`stock_supplies` (`created_at`, `id_product`, `quantity_add`, `quantity_rem`) VALUES (NOW(), 1, 6, 0);
INSERT INTO `ica_stock`.`stock_supplies` (`created_at`, `id_product`, `quantity_add`, `quantity_rem`) VALUES (NOW(), 1, 0, 2);
*/

-- IN/OUT -> stock

DROP TRIGGER IF EXISTS trigger_stock_flows_insert_after;

DELIMITER delimiter
CREATE TRIGGER trigger_stock_flows_insert_after AFTER INSERT ON stock_flows
FOR EACH ROW

BEGIN

  DECLARE var_quantity int(11);
   
  SET var_quantity = NEW.quantity_add - NEW.quantity_rem;
  
  UPDATE products SET quantity = quantity + var_quantity WHERE id = NEW.id_product;

END;
delimiter
DELIMITER ;

/*
INSERT INTO `ica_stock`.`stock_flows` (`created_at`, `id_product`, `quantity_add`, `quantity_rem`, `id_meal`) VALUES (NOW(), 1, 1, 0, 1);
INSERT INTO `ica_stock`.`stock_flows` (`created_at`, `id_product`, `quantity_add`, `quantity_rem`, `id_meal`) VALUES (NOW(), 1, 0, 2, 1);
*/