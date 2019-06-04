# For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life
zip -r ../../../open-orphanage-aleluya.zip * --exclude='./node_modules*' --exclude='*.sh' --exclude='README.md'
cd svn-aleluya/trunk
unzip ../../../../../open-orphanage-aleluya.zip
mv assets/* ../assets
