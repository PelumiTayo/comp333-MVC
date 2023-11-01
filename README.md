
<h1 align="center">
  <br>
  <img src="https://github.com/PelumiTayo/comp333-MVC/assets/98628508/6ebfa739-825b-467a-8d7b-62f3f50aa883" alt="SoundScore" width="200"></a>
  <h1 align="center">SonicScore</h1>
  <br>
  <br>
</h1>

<h4 align="center">An application that allows you to rate songs.</h4>

<p align="center">
  <a href="https://badge.fury.io/js/electron-markdownify">
    <img src="https://badge.fury.io/js/electron-markdownify.svg"
         alt="Gitter">
  </a>
  
</p>

 <div align="center">
    <a href="https://www.loom.com/share/c061696c7c2d4bf69834fbfa30b7db6d">
    </a>
    <a href="https://www.loom.com/share/c061696c7c2d4bf69834fbfa30b7db6d">
      <img style="max-width:300px;" src="https://cdn.loom.com/sessions/thumbnails/c061696c7c2d4bf69834fbfa30b7db6d-with-play.gif">
    </a>
  </div>


## Key Features

* User authentication
  - Log in to view, update, delete, or add to your song ratings!
* Mobile Friendly
  - Take SoundScore on the go!

## How To Use

To clone and run this application, you'll need [Git](https://git-scm.com) and [Node.js](https://nodejs.org/en/download/) (which comes with [npm](http://npmjs.com)) installed on your computer. From your command line:

```bash
# Clone this repository
$ git clone https://github.com/PelumiTayo/comp333-MVC.git

# Go into the repository
$ cd comp333-MVC

# For the frontend, go to directory mvc-frontend and install dependencies
$ npm install

# Run the app
$ npm start

# For the frontend, go to directory mvc-backend
- Make sure you have xampp installed, instructions [here](https://www.apachefriends.org/download.html).
- In xampp, run your mySQL database and Apache server.
- Move your backend folders into htdocs, which is provided by xampp.
- Congratulations! Your backend is up and running! :)

```

## Database Information
* user_table
<table>
    <tr>
        <td>username (primary key)</td>
        <td>password </td>
    </tr>
</table>

* ratings_table
<table>
    <tr>
        <td>id (primary key)</td>
        <td>username (foreign key) </td>
              <td>title </td>
        <td>artist </td>
        <td>rating </td>
    </tr>
</table>

## Deployed URL

  Coming very very soon!

## Credits

This software uses the following open source packages:

- [Node.js](https://nodejs.org/)
- Front-End built with [React](https://react.dev/) and [Material UI](https://mui.com/)
- Back-End build with [PHP](https://www.php.net/)


## License

MIT

---

> GitHub [@PelumiTayo](https://github.com/PelumiTayo) &nbsp;&middot;&nbsp;
> GitHub [@JohnWhangbo](https://github.com/jwwhangbo) &nbsp;&middot;&nbsp;
