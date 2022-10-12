cd ..
echo $PWD
sh scripts/gitpull.sh
php artisan route:cache
