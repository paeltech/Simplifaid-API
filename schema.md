#Simplifaid Modules

##Users module
User
    id
    name
    email
    password
    user_type

    ###Rel
    Belongs to usertype

User_types
    admin
    vendor
    rider

    ###Rel
    Has many users

##Products module
Category
    id
    name

Vendor
    id
    name
    user_id
