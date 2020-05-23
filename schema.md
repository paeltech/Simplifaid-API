# Simplifaid Modules

## Users module
### User
- id
- name
- email
- password
- user_type

    #### Rel
    - Belongs to usertype

### User_types
- admin
- vendor
- rider

    ### Rel
    - Has many users

## Products module
### Category
- id
- name

### Unit measures
- id
- name

### Vendors
- id
- name
- description
- rating
- user_id
- is active

    ### Rel
    - Has many products
    - Belongs to user

### Products
- id
- name
- description
- stock
- price
- unit_measure
