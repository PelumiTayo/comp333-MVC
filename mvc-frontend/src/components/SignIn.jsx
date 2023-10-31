import React from "react";
import {
  Grid,
  Paper,
  Avatar,
  TextField,
  CardMedia,
  Button,
  Typography,
  Box,
  Link,
} from "@mui/material";
import apiClient from "../services/apiClient";
import logo from "../assets/logo.png";
import BandPractice from "../assets/The Band Concert.png";

export default function SignUp({setIsLogged}) {
  const [userInfo, setUserInfo] = React.useState({
    username: "",
    password: "",
    usernameError: "",
    passwordError: "",
  });
  console.log(userInfo);
  const [loginError, setLoginError] = React.useState("");
  async function handleSubmit(e) {
    e.preventDefault();
    console.log("here");
    if (userInfo.username && userInfo.password.length >= 8) {
      try {
        setUserInfo((prevState) => ({
          ...prevState,
          usernameError: "",
          passwordError: "",
        }));
        const formData = new FormData();

        formData.append("username", userInfo.username);
        formData.append("password", userInfo.password);

        const { data, error, message } = await apiClient.login(formData);
        if (error) {
            setLoginError("Incorrect Username/Password.");
            return;
        }

        if (data) {
          setLoginError("");
          localStorage.setItem("username", userInfo.username);
          localStorage.setItem("loggedIn", true);
          setIsLogged(true)
        } else {
            setLoginError("Incorrect Username/Password.");
        }
        console.log(message, error, data);
      } catch (err) {
        console.log(err);
        setLoginError("Incorrect Username/Password.");
      }

      setUserInfo((prevState) => ({
        ...prevState,
        username: "",
        password: "",
      }));
    } else {
      if (userInfo.username.length === 0) {
        setUserInfo((prevState) => ({
          ...prevState,
          usernameError: "Please enter a valid username.",
        }));
      } else {
        setUserInfo((prevState) => ({
          ...prevState,
          usernameError: "",
        }));
      }
      if (userInfo.password.length < 8) {
        setUserInfo((prevState) => ({
          ...prevState,
          passwordError: "Please enter a valid password.",
        }));
      } else {
        setUserInfo((prevState) => ({
          ...prevState,
          passwordError: "",
        }));
      }
    }
  }
  return (
    <>
      <Box
        component="img"
        sx={{
          width: "98vw",
          position: "absolute",
          height: "100vh",
          zIndex: "-1",
          objectFit: "contain",
        }}
        alt="The house from the offer."
        src={BandPractice}
      ></Box>
      <Grid sx={{ marginTop: "100px" }}>
        <Paper
          elevation={10}
          style={{
            padding: 20,
            height: "70vh",
            width: 280,
            margin: "20px auto",
          }}
        >
          <Grid align="center">
            <Avatar style={{ backgroundColor: "white" }}>
              <CardMedia
                component="img"
                sx={{ objectFit: "fill" }}
                src={logo}
                alt="Live from space album cover"
              />
            </Avatar>
            <h2>Sign In</h2>
          </Grid>
          <TextField
            {...(userInfo.usernameError ? { error: true } : {})}
            helperText={userInfo.usernameError}
            sx={{ margin: "5px" }}
            label="Username"
            placeholder="Enter username"
            value={userInfo.username}
            onChange={(e) =>
              setUserInfo((prevState) => ({
                ...prevState,
                username: e.target.value,
              }))
            }
            fullWidth
            required
          />
          <TextField
            {...(userInfo.passwordError ? { error: true } : {})}
            helperText={userInfo.passwordError}
            sx={{ margin: "5px" }}
            label="Password"
            placeholder="Enter password"
            type="password"
            value={userInfo.password}
            onChange={(e) =>
              setUserInfo((prevState) => ({
                ...prevState,
                password: e.target.value,
              }))
            }
            fullWidth
            required
          />
          <Typography>{loginError}</Typography>
          <Button
            type="submit"
            color="primary"
            variant="contained"
            style={{ margin: "8px 0", backgroundColor: "#FFAC4B" }}
            onClick={handleSubmit}
            fullWidth
          >
            Sign In
          </Button>
          <Typography>
            {" "}
            Don't have an account?{" "}
            <Link
              style={{ textDecoration: "none", color: "#FFAC4B" }}
              href="\signUp"
            >
              Sign Up
            </Link>
          </Typography>
        </Paper>
      </Grid>
    </>
  );
}
