#!/usr/bin/env bash

set -euo pipefail

trap cleanup INT

function cleanup() {
  echo "Exit called, cleaning up and reverting to http..."
  cp ../nginx/sites/http.conf ../nginx/conf.d/sasofttest.conf
  rm ../nginx/certs/*.pem
  mkcert -uninstall
  echo "Goodbye!"
  exit 0
}

mkcert -install
mkcert -cert-file ../nginx/certs/localcert.pem -key-file ../nginx/certs/localkey.pem "sasofttest.local"
cp ../nginx/sites/https.conf ../nginx/conf.d/sasofttest.conf

echo "SSL enabled"
#echo "Press CTRL+C to exit..."
#
#while :
#do
#	sleep 1
#done