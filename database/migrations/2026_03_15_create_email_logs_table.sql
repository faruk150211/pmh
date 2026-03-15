CREATE TABLE email_logs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    service_request_id BIGINT UNSIGNED,
    recipient VARCHAR(255),
    subject VARCHAR(255),
    email_type VARCHAR(100), -- 'confirmation' or 'notification'
    status VARCHAR(50), -- 'sent', 'failed', 'pending'
    error_message LONGTEXT NULL,
    sent_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (service_request_id) REFERENCES service_requests(id) ON DELETE CASCADE
);
