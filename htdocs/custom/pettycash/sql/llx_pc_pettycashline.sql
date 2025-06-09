CREATE TABLE llx_pc_pettycashline (
  rowid INTEGER AUTO_INCREMENT PRIMARY KEY,
  fk_pettycash INTEGER NOT NULL,
  label VARCHAR(255),
  amount DOUBLE(24,8) DEFAULT 0,
  fk_project INTEGER DEFAULT NULL,
  doc_path VARCHAR(255),
  status INTEGER DEFAULT 0,
  entity INTEGER DEFAULT 1 NOT NULL,
  date_creation DATETIME NOT NULL,
  fk_user_author INTEGER,
  tms TIMESTAMP
) ENGINE=innodb;
