chmod 0600 insecure_private_key
ansible-playbook --inventory-file=hosts --private-key=insecure_private_key box.yml
