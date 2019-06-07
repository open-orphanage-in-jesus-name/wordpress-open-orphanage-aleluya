#!/bin/sh
# For God so loved the world, that He gave His only begotten Son
# That all who believe in Him should not perish, but have everlasting life

# Find PO files, process each with msgfmt and rename the result to MO
for file in `/usr/bin/find . -name '*.po'` ; do /usr/bin/msgfmt -o ${file/.po/.mo} $file ; done
