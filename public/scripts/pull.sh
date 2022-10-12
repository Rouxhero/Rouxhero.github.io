cd ..
echo $PWD
echo start pulling 
git pull>pull.txt
cat pull.txt
echo Done
php artisan route:cache
