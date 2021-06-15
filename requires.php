<?php

// Core Files

require __DIR__."/core/Application.php";
require  __DIR__."/core/Router.php";
require  __DIR__."/core/Request.php";
require __DIR__."/core/Response.php";
require __DIR__."/core/Controller.php";
require __DIR__."/core/Model.php";
require __DIR__."/core/Database.php";
require __DIR__."/core/DatabaseModel.php";
require __DIR__."/core/Session.php";
require __DIR__."/core/Middleware.php";

require __DIR__."/core/exceptions/NotFoundException.php";
require __DIR__."/core/exceptions/ForbiddenException.php";

require __DIR__."/middlewares/RegisterMiddleware.php";
require __DIR__."/middlewares/AcademicMiddleware.php";

require __DIR__."/core/form/Form.php";
require __DIR__."/core/form/Field.php";

// Controllers

require __DIR__."/controllers/PageController.php";
require __DIR__."/controllers/RegisterController.php";
require __DIR__."/controllers/LoginController.php";
require __DIR__."/controllers/DashboardController.php";
require __DIR__."/controllers/ClassroomController.php";

// Models

require __DIR__."/models/UserModel.php";
require __DIR__."/models/LoginModel.php";
require __DIR__."/models/ContactModel.php";
require __DIR__."/models/ClassroomModel.php";

require __DIR__."/config.php";