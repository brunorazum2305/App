
CREATE TABLE IF NOT EXISTS Position (
    PositionID INT PRIMARY KEY,
    Title VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Department (
    DepartmentID INT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    TeamLeadID INT,
    FOREIGN KEY (TeamLeadID) REFERENCES Employee(EmployeeID)
);



CREATE TABLE IF NOT EXISTS Employee (
    EmployeeID INT PRIMARY KEY,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    DateOfBirth DATE,
    Address VARCHAR(255),
    Email VARCHAR(255),
    PhoneNumber VARCHAR(15),
    HireDate DATE,
    Salary DECIMAL(10, 2),
    PositionID INT,
    FOREIGN KEY (PositionID) REFERENCES `Position`(PositionID)
);


ALTER TABLE Department
ADD FOREIGN KEY (TeamLeadID) REFERENCES Employee(EmployeeID);



CREATE TABLE IF NOT EXISTS WorksAt (
    EmployeeID INT,
    DepartmentID INT,
    PRIMARY KEY (EmployeeID, DepartmentID),
    FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID),
    FOREIGN KEY (DepartmentID) REFERENCES Department(DepartmentID)
);


CREATE TABLE IF NOT EXISTS HoldsPosition (
    EmployeeID INT,
    PositionID INT,
    PRIMARY KEY (EmployeeID, PositionID),
    FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID),
    FOREIGN KEY (PositionID) REFERENCES `Position`(PositionID)
);





INSERT INTO Employee (EmployeeID, FirstName, LastName, DateOfBirth, Address, Email, PhoneNumber, HireDate, Salary, PositionID) VALUES
(4, 'Bruno', 'Razum', '1990-01-15', '123 Oak street', 'bruno.razum@email.com', '555-1234', '2022-01-01', 80000.00, 1),
(5, 'Iva', 'Ivicic', '1985-05-20', '456 Willow street', 'Iva.ivicic@email.com', '555-5678', '2022-02-01', 90000.00, 2),
(6, 'Jasna', 'Jasnicic', '1995-08-10', '789 Pine St', 'Jasna.jasnicic@email.com', '555-9876', '2022-03-01', 75000.00, 3);

INSERT INTO Department (DepartmentID, Name, TeamLeadID) VALUES
(1, 'Engineering', 1),
(2, 'Management', 2),
(3, 'Human Resources', 3);

INSERT INTO Position (PositionID, Title) VALUES
(1, 'Software Engineer'),
(2, 'Project Manager'),
(3, 'HR Specialist');



SELECT EmployeeID, FirstName, LastName, Salary
FROM Employee;




SELECT
    d.DepartmentID,
    d.Name AS DepartmentName,
    e.EmployeeID,
    e.FirstName,
    e.LastName,
    AVG(e.Salary) AS AverageSalary
FROM
    Department d
JOIN
    Employee e ON d.TeamLeadID = e.EmployeeID
GROUP BY
    d.DepartmentID, e.EmployeeID;

   
   
DELIMITER //

CREATE PROCEDURE CalculateAverageSalary()
BEGIN
    SELECT AVG(Salary) AS AverageSalary
    FROM Employee;
END //

DELIMITER ;

CALL CalculateAverageSalary();
