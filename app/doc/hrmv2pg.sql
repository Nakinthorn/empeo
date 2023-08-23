-- SQLINES DEMO *** rated by MySQL Workbench
-- SQLINES DEMO *** 38 2023
-- SQLINES DEMO ***    Version: 1.0
-- SQLINES DEMO *** orward Engineering

/* SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0; */
/* SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0; */
/* SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION'; */

-- SQLINES DEMO *** ------------------------------------
-- Schema public
-- SQLINES DEMO *** ------------------------------------

-- SQLINES DEMO *** ------------------------------------
-- Schema public
-- SQLINES DEMO *** ------------------------------------
CREATE SCHEMA IF NOT EXISTS public DEFAULT CHARACTER SET utf8 ;
SET SCHEMA 'public' ;

-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** mployee`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE public.employee_seq;

CREATE TABLE IF NOT EXISTS public.employee (
  eid INT NULL DEFAULT NEXTVAL ('public.employee_seq'),
  fname VARCHAR(45) NOT NULL,
  lname VARCHAR(45) NOT NULL,
  date_of_birth VARCHAR(45) NOT NULL,
  hire_date VARCHAR(45) NULL,
  contact_info VARCHAR(45) NULL,
  passport_id VARCHAR(45) NULL,
  id_card VARCHAR(45) NULL,
  gender VARCHAR(10) NULL,
  company_name VARCHAR(45) NULL,
  PRIMARY KEY (eid))
;


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** ompany`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE public.company_seq;

CREATE TABLE IF NOT EXISTS public.company (
  cid INT NULL DEFAULT NEXTVAL ('public.company_seq'),
  name VARCHAR(45) NOT NULL,
  PRIMARY KEY (cid))
;


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** mployee_has_company`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE IF NOT EXISTS public.employee_has_company (
  company_cid INT NOT NULL,
  PRIMARY KEY (company_cid)
  CREATE INDEX fk_employee_has_company_company1_idx ON public.employee_has_company (company_cid ASC) ,
  CONSTRAINT fk_employee_has_company_company1
    FOREIGN KEY (company_cid)
    REFERENCES public.company (cid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** sers`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE public.users_seq;

CREATE TABLE IF NOT EXISTS public.users (
  uid INT NULL DEFAULT NEXTVAL ('public.users_seq'),
  email VARCHAR(45) NULL,
  password VARCHAR(100) NULL,
  employee_eid INT NOT NULL,
  status VARCHAR(20) NULL,
  role VARCHAR(45) NULL,
  PRIMARY KEY (uid, employee_eid)
  CREATE INDEX fk_users_employee1_idx ON public.users (employee_eid ASC) ,
  CONSTRAINT fk_users_employee1
    FOREIGN KEY (employee_eid)
    REFERENCES public.employee (eid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** ttendance`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE public.attendance_seq;

CREATE TABLE IF NOT EXISTS public.attendance (
  aid INT NOT NULL DEFAULT NEXTVAL ('public.attendance_seq'),
  today DATE NULL,
  time_in TIMESTAMP(0) NULL,
  time_out TIMESTAMP(0) NULL,
  employee_eid INT NOT NULL,
  PRIMARY KEY (aid, employee_eid)
  CREATE INDEX fk_attendance_employee1_idx ON public.attendance (employee_eid ASC) ,
  CONSTRAINT fk_attendance_employee1
    FOREIGN KEY (employee_eid)
    REFERENCES public.employee (eid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** eave_request`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE public.leave_request_seq;

CREATE TABLE IF NOT EXISTS public.leave_request (
  leave_id INT NOT NULL DEFAULT NEXTVAL ('public.leave_request_seq'),
  employee_eid INT NOT NULL,
  leave_type VARCHAR(45) NULL,
  start_date BIGINT NULL,
  end_date BIGINT NULL,
  reason VARCHAR(200) NULL,
  status VARCHAR(45) NULL,
  PRIMARY KEY (leave_id, employee_eid)
  CREATE INDEX fk_leave_request_employee1_idx ON public.leave_request (employee_eid ASC) ,
  CONSTRAINT fk_leave_request_employee1
    FOREIGN KEY (employee_eid)
    REFERENCES public.employee (eid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** epartments`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE public.departments_seq;

CREATE TABLE IF NOT EXISTS public.departments (
  dp_id INT NOT NULL DEFAULT NEXTVAL ('public.departments_seq'),
  dpname VARCHAR(45) NOT NULL,
  PRIMARY KEY (dp_id))
;


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** ob_positions`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE IF NOT EXISTS public.job_positions (
  job_title VARCHAR(50) NOT NULL,
  salary INT NULL,
  employee_eid INT NOT NULL,
  departments_dp_id INT NOT NULL,
  PRIMARY KEY (employee_eid, departments_dp_id)
  CREATE INDEX fk_employee_job_positions_employee1_idx ON public.job_positions (employee_eid ASC) ,
  INDEX fk_employee_job_positions_departments1_idx (departments_dp_id ASC) ,
  CONSTRAINT fk_employee_job_positions_employee1
    FOREIGN KEY (employee_eid)
    REFERENCES public.employee (eid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_employee_job_positions_departments1
    FOREIGN KEY (departments_dp_id)
    REFERENCES public.departments (dp_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** ependents`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE public.dependents_seq;

CREATE TABLE IF NOT EXISTS public.dependents (
  dependents_id INT NOT NULL DEFAULT NEXTVAL ('public.dependents_seq'),
  relationship VARCHAR(45) NULL,
  job_positions_job_id INT NOT NULL,
  employee_eid INT NOT NULL,
  departments_dp_id INT NOT NULL,
  manager_id INT GENERATED ALWAYS AS (),
  PRIMARY KEY (dependents_id, job_positions_job_id, employee_eid, departments_dp_id, manager_id)
  CREATE INDEX fk_dependents_job_positions1_idx ON public.dependents (employee_eid ASC, departments_dp_id ASC) ,
  INDEX fk_dependents_employee1_idx (manager_id ASC) ,
  CONSTRAINT fk_dependents_job_positions1
    FOREIGN KEY (employee_eid , departments_dp_id)
    REFERENCES public.job_positions (employee_eid , departments_dp_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_dependents_employee1
    FOREIGN KEY (manager_id)
    REFERENCES public.employee (eid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** ependents_has_employee`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE IF NOT EXISTS public.dependents_has_employee (
  dependents_dependents_id INT NOT NULL,
  employee_eid INT NOT NULL,
  PRIMARY KEY (dependents_dependents_id, employee_eid)
  CREATE INDEX fk_dependents_has_employee_employee1_idx ON public.dependents_has_employee (employee_eid ASC) ,
  INDEX fk_dependents_has_employee_dependents1_idx (dependents_dependents_id ASC) ,
  CONSTRAINT fk_dependents_has_employee_dependents1
    FOREIGN KEY (dependents_dependents_id)
    REFERENCES public.dependents (dependents_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_dependents_has_employee_employee1
    FOREIGN KEY (employee_eid)
    REFERENCES public.employee (eid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** ork_outside_office`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE public.work_outside_office_seq;

CREATE TABLE IF NOT EXISTS public.work_outside_office (
  wo_id INT NOT NULL DEFAULT NEXTVAL ('public.work_outside_office_seq'),
  workdate BIGINT NOT NULL,
  employee_eid INT NOT NULL,
  location VARCHAR(255) NULL,
  reason VARCHAR(255) NULL,
  approve_byid VARCHAR(45) NOT NULL,
  approve_status VARCHAR(45) NULL,
  PRIMARY KEY (wo_id, employee_eid)
  CREATE INDEX fk_work_outside_office_employee1_idx ON public.work_outside_office (employee_eid ASC) ,
  CONSTRAINT fk_work_outside_office_employee1
    FOREIGN KEY (employee_eid)
    REFERENCES public.employee (eid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** vertime_requests`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE IF NOT EXISTS public.overtime_requests (
  id INT NOT NULL,
  employee_eid INT NOT NULL,
  date BIGINT NOT NULL,
  hours INT NOT NULL,
  rate_per_hours INT NOT NULL,
  reason VARCHAR(255) NULL,
  Status VARCHAR(45) NOT NULL DEFAULT 'not_approved',
  create_datetime BIGINT NOT NULL,
  PRIMARY KEY (id, employee_eid)
  CREATE INDEX fk_overtime_requests_employee1_idx ON public.overtime_requests (employee_eid ASC) ,
  CONSTRAINT fk_overtime_requests_employee1
    FOREIGN KEY (employee_eid)
    REFERENCES public.employee (eid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SCHEMA 'public' ;

-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO ***  for view `public`.`view1`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE IF NOT EXISTS public.view1 (id INT);

-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO ***  for view `public`.`view2`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE IF NOT EXISTS public.view2 (id INT);

-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO ***  for view `public`.`view3`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE IF NOT EXISTS public.view3 (id INT);

-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO ***  for view `public`.`view4`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE IF NOT EXISTS public.view4 (id INT);

-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** ew1`
-- SQLINES DEMO *** ------------------------------------
DROP TABLE IF EXISTS public.view1;
SET SCHEMA 'public';


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** ew2`
-- SQLINES DEMO *** ------------------------------------
DROP TABLE IF EXISTS public.view2;
SET SCHEMA 'public';


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** ew3`
-- SQLINES DEMO *** ------------------------------------
DROP TABLE IF EXISTS public.view3;
SET SCHEMA 'public';


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** ew4`
-- SQLINES DEMO *** ------------------------------------
DROP TABLE IF EXISTS public.view4;
SET SCHEMA 'public';


/* SET SQL_MODE=@OLD_SQL_MODE; */
/* SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS; */
/* SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS; */
