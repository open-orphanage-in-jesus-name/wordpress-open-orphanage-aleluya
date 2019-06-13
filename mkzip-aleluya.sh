# For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life
rm ../../../open-orphanage-aleluya.zip
zip -r ../../../open-orphanage-aleluya.zip * --exclude='./public-aleluya/thumbs-aleluya' --exclude='./node_modules*' --exclude='*.sh' --exclude='./*.md' --exclude='./svn-aleluya*'
cd svn-aleluya/trunk
if [ $? = 0 ]; then
	#rm * -rf
  unzip ../../../../../open-orphanage-aleluya.zip
  mv assets/* ../assets
fi
