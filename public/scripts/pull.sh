cd ..
echo $PWD
echo start pulling 
git pull
echo Done
php artisan route:cache
