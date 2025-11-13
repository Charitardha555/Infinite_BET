# Infinite_BET

## Project Overview

Infinite_BET is a sophisticated PHP-based phishing simulation platform designed exclusively for cybersecurity awareness and educational research. Developed as a controlled environment, it replicates the tactics and impact of real-world phishing attacks to help defenders better understand threat vectors and user vulnerabilities.

---

## Objectives

- Build an advanced phishing simulation platform demonstrating multi-faceted data capture methods.
- Educate security professionals and end-users about the severity and methods of phishing attacks.
- Provide a realistic yet safe framework for testing anti-phishing defenses.
- Demonstrate innovative features such as biometric captures and clipboard hijacking to raise awareness on emerging threats.

---

## Features

- **Comprehensive Data Collection:**
  - IP address and geolocation logging.
  - Detailed browser and OS fingerprinting.
  - Periodic screenshots via webcam capture saved in `/photos`.
  - Continuous audio and video recording in `/videos`.
  - Clipboard contents capture.
  - Aggregated user activity and metadata logging.

- **Stealth and Automation:**
  - Background data capture every few seconds without user interruption.
  - Auto-logging of clicks and session timing.
  
- **Structured Storage:**
  - File-based storage for images, videos, and logs, simplifying access and analysis.
  - User data consolidated into `user.info.txt` for quick reference.

---

## Architecture

- **Frontend:** HTML and JavaScript manage dynamic UI and media capture APIs.
- **Backend:** PHP scripts coordinate file uploads, logging, and session management.
- **Storage:** Captured media and logs stored on the server file system under organized directories.
- **Security:** Operates within ethical constraints, designed for defensive awareness use only.

---

## Ethical Considerations

Strictly intended for ethical use such as security training and awareness programs. Unlawful use is expressly forbidden. This project serves as an educational tool, not for exploitation or unauthorized data collection.

---

## Deployment & Use

- Host on a PHP and Apache-enabled server.
- Deploy with HTTPS to facilitate browser media access policies.
- Suitable for intrusion detection and user training programs.
- Monitor captured data responsibly, respecting privacy and legal guidelines.

---

## Impact & Legacy

One of the first projects demonstrating deep biometric and clipboard capture in phishing simulations, advancing blue team capabilities in recognizing and mitigating modern phishing threats.

---

## License

Apache License. See LICENSE file for details.

---

--. .-. . .- - -....- .--. --- .-- . .-. -....- -.-. --- -- . ... -....- .-- .. - .... -....- --. .-. . .- - -....- .-. . ... .--. --- -. ... .. -... .. .-.. .. - -.--

