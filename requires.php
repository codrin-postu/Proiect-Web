<?php

// Core Files

require __DIR__ . "/core/Application.php";
require  __DIR__ . "/core/Router.php";
require  __DIR__ . "/core/Request.php";
require __DIR__ . "/core/Response.php";
require __DIR__ . "/core/Controller.php";
require __DIR__ . "/core/Model.php";
require __DIR__ . "/core/Database.php";
require __DIR__ . "/core/DatabaseModel.php";
require __DIR__ . "/core/Session.php";
require __DIR__ . "/core/Middleware.php";

require __DIR__ . "/core/exceptions/NotFoundException.php";
require __DIR__ . "/core/exceptions/ForbiddenException.php";

// Form Generation

require __DIR__ . "/core/form/Form.php";
require __DIR__ . "/core/form/Field.php";

// Controllers

require __DIR__ . "/controllers/PageController.php";
require __DIR__ . "/controllers/RegisterController.php";
require __DIR__ . "/controllers/LoginController.php";
require __DIR__ . "/controllers/DashboardController.php";
require __DIR__ . "/controllers/ClassroomController.php";

// Models

require __DIR__ . "/models/UserModel.php";
require __DIR__ . "/models/LoginModel.php";
require __DIR__ . "/models/ContactModel.php";
require __DIR__ . "/models/ClassroomModel.php";
require __DIR__ . "/models/UserClassroomModel.php";
require __DIR__ . "/models/ClassroomJoinModel.php";
require __DIR__ . "/models/UserUpdateModel.php";
require __DIR__ . "/models/PasswordUpdateModel.php";
require __DIR__ . "/models/AttendanceCodeModel.php";
require __DIR__ . "/models/UserAttendanceModel.php";
require __DIR__ . "/models/LessonModel.php";
require __DIR__ . "/models/HomeworkModel.php";
require __DIR__ . "/models/UserHomeworkModel.php";

// Navigation/Table Generation

require __DIR__ . "/controllers/generate/Navigation.php";
require __DIR__ . "/controllers/generate/GeneratedCodesTable.php";
require __DIR__ . "/controllers/generate/UserAttendanceInformation.php";
require __DIR__ . "/controllers/generate/LessonTable.php";
require __DIR__ . "/controllers/generate/HomeworksTable.php";

// Middlewares

require __DIR__ . "/middlewares/RegisterMiddleware.php";
require __DIR__ . "/middlewares/AcademicMiddleware.php";
require __DIR__ . "/middlewares/StudentMiddleware.php";
require __DIR__ . "/middlewares/MemberClassroomMiddleware.php";
require __DIR__ . "/middlewares/CreatorClassroomMiddleware.php";

// Fields

require __DIR__ . "/fields/TextField.php";
require __DIR__ . "/fields/NumberField.php";
require __DIR__ . "/fields/TextareaField.php";
require __DIR__ . "/fields/SelectField.php";
require __DIR__ . "/fields/PasswordField.php";
require __DIR__ . "/fields/EmailField.php";
require __DIR__ . "/fields/CheckboxField.php";
require __DIR__ . "/fields/HiddenField.php";
require __DIR__ . "/fields/DateField.php";
require __DIR__ . "/fields/DateTimeField.php";
require __DIR__ . "/fields/FileField.php";

require __DIR__ . "/config.php";
