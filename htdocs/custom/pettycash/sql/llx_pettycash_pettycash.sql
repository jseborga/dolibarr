CREATE TABLE llx_pc_pettycash (
  rowid INTEGER AUTO_INCREMENT PRIMARY KEY,
  entity INTEGER DEFAULT 1 NOT NULL,
  fk_user INTEGER NOT NULL,
  balance DOUBLE(24,8) DEFAULT 0,
  fk_project INTEGER DEFAULT NULL,
  doc_path VARCHAR(255),
  status INTEGER DEFAULT 0,
  date_creation DATETIME NOT NULL,
  tms TIMESTAMP,
  fk_user_create INTEGER,
  fk_user_modif INTEGER
) ENGINE=innodb;
