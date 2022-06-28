ALTER TABLE employee
  ADD State varchar(255) NULL
    AFTER Email,
  ADD District varchar(255) NULL
    AFTER State;