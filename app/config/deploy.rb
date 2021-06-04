set :application, "mgc24"
set :domain,      "test.#{application}.com"
set :deploy_to,   "/var/www/mgc-test"
set :app_path,    "app"
set :user,        "lord"
set :scm,         :git
set :use_sudo,      false
set :repository,    "git@bitbucket.org:Dext3r/maxgamedcloud.git"

set :webserver_user,      "www-data"
set :permission_method,   :acl
set :use_set_permissions, true
set :clear_controllers, false

set :composer_options,  "--no-dev --verbose --prefer-source --optimize-autoloader"

set :model_manager, "doctrine"

set   :use_composer, true
set   :update_vendors, false
set   :copy_vendors, true
set   :shared_files, ["app/config/parameters.yml", "web/.htaccess", "web/app_dev.php", "web/app_test.php"]
set   :shared_children, ["app/sessions", "web/uploads", "app/swift_spool"]

set :writable_dirs,     ["app/cache", "app/logs", "app/swift_spool"]

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set  :keep_releases,  10
after "deploy:update", "deploy:cleanup"

# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL
