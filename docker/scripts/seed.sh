#!/usr/bin/env bash

set -euo pipefail

docker exec sasoft-test-app php artisan db:seed EmployeeSeeder
