DROP TABLE IF EXISTS user;
CREATE TABLE IF NOT EXISTS user (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password char(60) NOT NULL,
  PRIMARY KEY (id)

) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;
