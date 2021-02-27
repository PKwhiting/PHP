INSERT INTO clients (clientFirstname,clientLastname,clientEmail,clientPassword,comment) VALUES ('Tony','Stark','tony@starkent.com','Iam1ronM@n','I am the real Ironman');
UPDATE clients SET clientLevel = '3' WHERE clientid = '1';
UPDATE inventory SET invDescription = replace(invDescription, 'small interior', 'spacious interior');
SELECT carclassification.classificationName, inventory.invModel FROM inventory INNER JOIN carclassification ON carclassification.classificationId = inventory.classificationId WHERE carclassification.classificationId = '1';
DELETE FROM inventory WHERE invModel = 'Wrangler';
UPDATE inventory SET invImage=CONCAT('/phpmotors',invImage);
UPDATE inventory SET invThumbnail=CONCAT('/phpmotors',invThumbnail);