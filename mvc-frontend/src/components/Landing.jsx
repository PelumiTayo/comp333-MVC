import React from "react";
import { Box, Typography, Button } from "@mui/material";
import Footer from "./Footer.jsx";

//importing image from assets folder. 
import BandPractice from "../assets/The Band Band Practice.jpg";
export default function Landing() {
  return (
    <>
      <Box
        sx={{
          display: "flex",
          justifyContent: "space-around",
          width: "96vw",
          height: "100vh",
          margin: "0 auto",
        }}
      >
        <Box
          sx={{
            display: "flex",
            flexDirection: "column",
            justifyContent: "center",
            width: "30em",
          }}
        >
          <Typography align="center" variant="h1">
            Sonic<span style={{ color: "#FF5A5A" }}>Score</span>
          </Typography>
          <Typography
            sx={{ fontWeight: "bolder", margin: "15px" }}
            align="center"
          >
            SonicScore is a comprehensive music rater application designed to
            allow users to enter, rate, and review their favorite songs.
          </Typography>
          <Button
            component="a"
            sx={{ display: "block", backgroundColor: "#FFAC4B" }}
            variant="contained"
            align="center"
            href="/signUp"
          >
            Get Started Today
          </Button>
        </Box>
        <Box
          component="img"
          sx={{
            width: "98vw",
            position: "absolute",
            height: "130vh",
            zIndex: "-1",
            objectFit: "contain",
          }}
          alt="The house from the offer."
          src={BandPractice}
        ></Box>
      </Box>
      <Footer />
    </>
  );
}
