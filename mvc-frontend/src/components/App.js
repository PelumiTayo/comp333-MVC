// Imported fonts for Material UI
import "@fontsource/roboto/300.css";
import "@fontsource/roboto/400.css";
import "@fontsource/roboto/500.css";
import "@fontsource/roboto/700.css";

import "./App.css";
import Landing from "./Landing.jsx";
import Navbar from "./Navbar.jsx";
import Footer from "./Footer.jsx";

export default function App() {
  return (
    <>
      <Navbar />
      <Landing />
      <Footer/>
    </>
  );
}
