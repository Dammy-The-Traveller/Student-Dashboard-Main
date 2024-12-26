# Student Dashboard and ID Management System

## Project Overview
This system enables students to login, generate ID cards, and view their course information while providing administrators with tools for attendance recording and ID card management including real-time scanning updates for attendance. 

### Features

#### Student Dashboard
- **Registration**: Students can login with their details, including their program, level, and semester.
- **Dashboard Access**: After registration, students are redirected to a dashboard.
- **ID Generator**:
  - Generate an ID card.
  - Print the ID card.
  - Generate two QR codes:
    - **QR Code 1**: Contains student information.
    - **QR Code 2**: Lists the student's courses based on their program, level, and semester.

#### Administrator Features
- **Attendance Management**:
  - Scan the first QR code to record student attendance.
  - View and manage the attendance system.
- **ID Card Management**:
  - Modify student ID cards.

---

## Project Structure
### Key Components
1. **Login**:
   - Handles student data input and validation.
   - Automatically assigns courses to students based on their program, level, and semester.

2. **Dashboard**:
   - Displays student information.
   - Provides links to key features like ID card generation.
   - Provides links to key features like Registered Courses.

3. **ID Generator**:
   - Enables ID card creation, QR code generation, and printing.

4. **Administrator Panel**:
   - Allows administrators to scan QR codes, manage ID cards, and review attendance records.

### Database Structure
1. **Users Table Known as r_student**:
   Stores student and administrator information.
2. **Courses Table Known as reg_courses**:
   Holds course information (code, student_id, level, semester, program).
    Links students to their assigned courses.

3. **Attendance Table**:
   Records attendance based on scanned QR codes.

---

## Technologies Used
- **Frontend**: HTML, CSS, Bootstrap, JavaScript, ajax
- **Backend**: PHP (with Object-Oriented Programming)
- **Database**: MySQL
- **QR Code Generation**: QR code libraries integrated into PHP.

---

## Future Enhancements
--**Add notifications for students upon successful registration or ID approval**.
--**Implement an export feature for attendance records (e.g., to Excel)**.

## Installation and Setup
1. Clone the repository:
   ```bash
   git clone https://github.com/Dammy-The-Traveller/Student-Dashboard-Main.git

  

Author
Developed by Mr. Damilare David Adebesin(Danny_The_Traveller)