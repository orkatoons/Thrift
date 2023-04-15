<style>
    body {
    margin: 0;
    padding: 0;
    /* font-family: sans-serif; */
    background-color: #f2f2f2;
    font-family: Arial, Helvetica, sans-serif;
}
nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
nav a {
    color: #333;
    text-decoration: none;
    margin-right: 20px;
    transition: color 0.3s ease-in-out;
}
nav a:hover {
    color: #f76707;
}
nav #logo {
    font-size: 24px;
    font-weight: bold;
}
nav #tagline {
    font-size: 16px;
    font-style: italic;
    color: #666;
}
nav #login {
    background-color: #f76707;
    color: #fff;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}
nav #login:hover {
    background-color: #e66006;
}
nav #dark-mode {
    display: flex;
    align-items: center;
}
nav #dark-mode input[type=checkbox] {
    /* -webkit-appearance: none; */
    background-color: #ccc;
    border-radius: 20px;
    width: 40px;
    height: 20px;
    position: relative;
    margin-right: 10px;
    cursor: pointer;
}
nav #dark-mode input[type=checkbox]:checked {
    background-color: #f76707;
}
nav #dark-mode input[type=checkbox]:before {
    content: "";
    position: absolute;
    width: 16px;
    height: 16px;
    background-color: #fff;
    border-radius: 50%;
    top: 2px;
    left: 2px;
    transition: transform 0.3s ease-in-out;
}
nav #dark-mode input[type=checkbox]:checked:before {
    transform: translateX(20px);
}

</style>