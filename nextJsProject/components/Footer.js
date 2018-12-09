import React from 'react'
import styled from 'styled-components'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import {
  faFacebookF,
  faTwitter,
  faLine
} from '@fortawesome/free-brands-svg-icons'
library.add(faFacebookF, faTwitter, faLine)

export default class Footer extends React.Component {
  render() {
    return (
      <div
        style={{
          height: 400,
          width: '100%',
          background: '#2E2E2E'
        }}
      >
        <div style={{ textAlign: 'center', color: 'white', paddingTop: 150 }}>
          <h1>Contact Us</h1>
          <div
            style={{
              display: 'flex',
              alignItems: 'center',
              justifyContent: 'center',
              paddingTop: 50
            }}
          >
            <IconContainer data-href="https://developers.facebook.com/docs/plugins/">
              <a href={`https://www.facebook.com/sharer.php?src=bm&u=`}>
                <FontAwesomeIcon
                  style={{ width: 35, height: 35 }}
                  color="white"
                  icon={['fab', 'facebook-f']}
                />
              </a>
            </IconContainer>
            <IconContainer data-href="https://developers.facebook.com/docs/plugins/">
              <a href={`https://www.facebook.com/sharer.php?src=bm&u=`}>
                <FontAwesomeIcon
                  style={{ width: 35, height: 35 }}
                  color="white"
                  icon={['fab', 'twitter']}
                />
              </a>
            </IconContainer>
            <IconContainer>
              <a href={`https://social-plugins.line.me/lineit/share?url=`}>
                <FontAwesomeIcon
                  style={{ width: 35, height: 35 }}
                  color="white"
                  icon={['fab', 'line']}
                />
              </a>
            </IconContainer>
          </div>
        </div>
      </div>
    )
  }
}

const IconContainer = styled.div`
  background: #000000;
  height: 70px;
  width: 70px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  margin-left: 12px;
  margin-right: 12px;
`
